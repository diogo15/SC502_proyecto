<template>
    <div class="login">
        <h1 class="title">Inicio de Sesión</h1>
        <form v-on:submit.prevent="" class="form">
            <label class="form-label" for="#email">Correo de usuario:</label>
            <input v-model="email" class="form-input" type="email" required placeholder="Email" id="loginEmail">
            <label class="form-label" for="#password">Contraseña:</label>
            <input v-model="password" class="form-input" type="password" required placeholder="Contraseña" id="loginPassword">

            <btn class="green" v-on:click="enviarDatos()" id="loginInit">Iniciar sesión</btn>

            <btn class="link registerBtn"><router-link to="/registro">Regístrate</router-link></btn>

            <p class="message" id="loginMessage">{{ message }}</p>
        </form>
    </div>
</template>

<script>
module.exports = {
  metaInfo: {
    title: 'Acceso',
    meta: [
      { name: 'description', content: 'Página de acceso para nuetros clientes.' },
    ]
  },
    data: function() {
        return {
            message: "",
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
            }).then(response => {
                if(response.data.data.login == 1){
                    this.message= "Ingreso Exitoso!";
                    setTimeout(function(){ location.reload(); }, 1500);
                }else{
                    this.message= "Error Intenta de Nuevo";
                }
            }).catch(err => {
                console.log(err)
            })

        }
    },
    components: {
        'btn': httpVueLoader(site_url + 'js/componentes/btn.vue')
    }
}
</script>

<style>
    .login {
        padding: 10px;
    }

    .login .title {
        text-align: center;
    }

    .login .form {
        box-sizing: border-box;
        margin: 3rem auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        max-width: 350px;
        background: #333333;
        border-radius: 5px;
        padding: 40px;
        box-shadow: 0 4px 10px 4px rgba(0, 0, 0, 0.3);
    }
    .login .form-label {
        margin-top: 2rem;
        color: white;
        margin-bottom: 0.5rem;
    }

    .login .form-input {
        padding: 10px 15px;
        background: none;
        background-image: none;
        border: 1px solid white;
        color: white;
    }

    .login .button  {
        margin-top: 3rem;
    }

    .login .button.registerBtn{
        margin-top: 10px;
    }

    .close{
        padding: 10px 15px;
    }
    .login .message{
        color: #FFF;
    }

    .modal .login .title{
        display: none;
    }

    .modal .login {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
    }
</style>