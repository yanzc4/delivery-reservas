import openai
import config
import typer
from rich import print
from rich.table import Table


def main():

    openai.api_key = config.api_key

    print("💬 [bold green]Hola, soy un asistente virtual")

    table= Table("Comando", "Descripcion")
    table.add_row("exit", "Salir del programa")
    table.add_row("new", "Crear una nueva conversacion")

    print(table)

    context={"role": "system", 
                "content" :"Eres un asistente muy util."}

    #Contexto del asistente virtual
    messages = [context]

    while True:


        content=__pront()

        if content == "new":
            print("🆕 Nueva conversacion creada")
            messages = [context]
            content=__pront()

        messages.append({"role": "user", "content":content})

        response=openai.ChatCompletion.create(model="gpt-3.5-turbo",
                    messages=messages)

        response_content = response.choices[0].message.content

        messages.append({"role": "assistant", "content":response_content})

        print(f"[bold green]> [/bold green] [green]{response_content}[/green]")


def __pront() -> str:
    prompt=typer.prompt("\n¿Sobre que quieres hablar? ")

    if prompt == "exit":
        exit=typer.confirm("✋ ¿Estas seguro que quieres salir?")
        if exit:
            print("👋 Hasta luego")
            raise typer.Abort()

        return __pront()

    return prompt

if __name__ == "__main__":
    typer.run(main)