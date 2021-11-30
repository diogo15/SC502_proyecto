<template>
    <div class="login">
        <h1 class="title">Inicio de Sesión</h1>
        
        <form v-on:submit.prevent="enviarDatos()" class="form">
            <label class="form-label" for="#email">Correo de usuario:</label>
            <input v-model="email" class="form-input" type="email" required placeholder="Email">
            <label class="form-label" for="#password">Contraseña:</label>
            <input v-model="password" class="form-input" type="password" placeholder="Contraseña">

            <input class="form-submit" type="submit" value="Iniciar sesión">
        </form>
    </div>
</template>

<script>
module.exports = {
    data: function() {
        return {
            email: "",
            password: ""
        }   
    },
    
    methods : {
        enviarDatos () {

            var formData = new FormData();
            formData.append("email", this.email);
            formData.append("password", this.password);

            axios.post(site_url + 'php/login.php', formData, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then(data =>
                console.log(data)
            ).catch(err => {
                console.log(err)
            })

        }
    }
}
</script>

<style>
    .login {
        padding: 10px;
    }

    .title {
        text-align: center;
    }

    .form {
        margin: 3rem auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 20%;
        min-width: 350px;
        max-width: 100%;
        background: #333333;
        border-radius: 5px;
        padding: 40px;
        box-shadow: 0 4px 10px 4px rgba(0, 0, 0, 0.3);
    }
    .form-label {
        margin-top: 2rem;
        color: white;
        margin-bottom: 0.5rem;
    }

    .form-input {
        padding: 10px 15px;
        background: none;
        background-image: none;
        border: 1px solid white;
        color: white;
    }

    .form-submit {
        background: #45B173;
        border: none;
        color: white;
        margin-top: 3rem;
        padding: 1rem 0;
        cursor: pointer;
    }
</style>