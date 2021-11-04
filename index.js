/*
    Mediante la terminal realizar las instalaciones al proyecto
    Utilizar npm init: para generar un archivo .json que guardará la información para inicializar el proyecto y guardará los paquetes instalados
    Por medio de npm install express nodemon: se descargarán express y nodemon 
        se generará un paquete .json que permitirá el acceso al navegador
    E instalará varias utilidades tanto de Node.js como de Express.js
*/

// Importar el paquete de Express.js

const express = require('express');

/*
    Para usar el paquete de MySQL se debe instalar mediante la terminal: npm install mysql
    Crear una constante que utilice las propiedades de MySQL
*/

const mysql = require('mysql');

// Crear la conexión
// Agregar puerto por si acaso
var connection = mysql.createConnection({
    host:'localhost',
    user:'root',
    password:''
});

// Realizar esa conexión a MySQL

connection.connect(err =>{
    if (err) {
        throw err
    }
    console.log("MySQL conectado!");
});

/*
    Middlewares
    Son funciones que se ejecutan cuando se navega a un ruta, o cuando una ruta es usada.
    Estas funciones se ejecutan antes de ingresar en la ruta.
*/

//app.use('/elementos', () =>{
    //console.log('Middleware en uso...');
//});

// Asignar las funciones del paquete express a una constante que facilitará el uso de las librerías del express.

const app = express();

app.get('/initdb', (req, res) => {
    let sql = 'USE WebPage';
    connection.query(sql, err => {
        if (err) {
            throw err;
        }
        res.send('Bienvenido a WebPage');
    });
});

app.get('/',(req, res) => {
    res.send('Inicio de la página')
});

//Listening: Por cuál puerto la app se va a comunicar con el exterior 
app.listen(3000, () => {
    console.log('Servidor alzado en el puerto 3000');
});