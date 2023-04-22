import openai
import apiKey

openai.api_key = apiKey.api_key

messages = [{"role": "assistant", "content": "Eres un asistente virtual"}]

while True:

    content=input("¿Sobre qué quieres hablar? ")

    if content == "exit":
        break

    messages.append({"role": "user", "content": content})

    response=openai.ChatCompletion.create(model="gpt-3.5-turbo", messages=messages)

    response_content=response.choices[0].message.content

    messages.append({"role": "assistant", "content": response_content})

    print(response_content)


