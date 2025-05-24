import { GoogleGenerativeAI } from "@google/generative-ai";

const API_KEY = 'AIzaSyDS82toPDAk8Erx5xcVXDHgkwVbVuywnbA';
const genAI = new GoogleGenerativeAI(API_KEY);

document.getElementById('botonChef').addEventListener('click', async () => {
    const fotoChef = document.getElementById('fotoChef');
    const inputText = document.getElementById('inputText').value;
    const prompt = `Dame 5 recetas de (Solo recetas de cocina, no quiero que hables de otra cosa que no sea esas 5 recetas. Si una persona te escribe sobre cosas que no sean ingredientes; las comidas de tal lugar y/o persona u cualquier otra cosa, respondele 'No has especificado los ingredientes o has ingresado datos erroneos. NO HAGAS ENOJAR AL CHEF!! :)') con los siguientes productos:` + inputText;
    const model = genAI.getGenerativeModel({ model: "gemini-2.0-flash" });

    // Función para cambiar la imagen con desvanecimiento
    const cambiarImagen = (nuevaSrc) => {
        // Añadir la clase "fading" para la animación
        document.getElementById('cortina').classList.add('desvanecer');
        
        // Esperar a que la animación se complete antes de cambiar la imagen
        setTimeout(() => {
            fotoChef.src = nuevaSrc;
            // Remover la clase "fading" una vez que se ha cambiado la imagen
            document.getElementById('cortina').classList.remove('desvanecer');
        }, 1000); // Duración de la animación (debe coincidir con el CSS)
    };

    cambiarImagen('imagenes/chef_proceso.png'); // Cambiar a la imagen de proceso

    try {
        const result = await model.generateContent(prompt);
        const response = await result.response;
        
        // Esperar a que la imagen de proceso se haya cambiado y luego cambiar a imagen de resultado
        setTimeout(() => {
            document.getElementById('responseText').innerText = response.text();
            cambiarImagen('imagenes/chef_resultado.png'); // Cambiar a la imagen de resultado
        }, 3000); // Esperar a que la primera imagen se configure
    } catch (error) {
        console.error('Error al generar contenido:', error);
    }
});

