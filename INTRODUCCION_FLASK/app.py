# Importar los paquetes de flask
from flask import Flask

#creamos una instancia de la aplicacion
app = Flask(__name__)

# Creación de ruta, la ruta / es la ruta raíz, será la que se mostrara cuando el proyecto se ejecute
@app.route("/")
def home():
    return ("Hola Crayola!")

# Iniciamos el servidor FLASK en el puerto 5000
if __name__ == "__main__":
    app.run(port=5000)