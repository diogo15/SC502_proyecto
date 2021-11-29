<template>
    <div class="wrapper">
        <h1>Registrar</h1>
        <form class="registro">
        <input type="text" placeHolder="correo" v-model="correo">
        <input type="text" placeHolder="nombre" v-model="nombre">
        <input type="text" placeHolder="fechaNacimiento" v-model="fechaNacimiento">
        <input type="text" placeHolder="telefono" v-model="telefono">
        <input type="text" placeHolder="password" v-model="password">
        <input type="text" placeHolder="passwordConfirm" v-model="passwordConfirm">
        <button v-on:click="registrar()">Registrar</button>    
        </form>
    </div>
</template>

<script>
module.exports = {
  data: function() {
    return{
      correo: "",
      password: "",
      nombre: "",
      fechaNacimiento: "",
      passwordConfirm: "",
      telefono: ""
    }
  },
  methods : {
        enviarDatos () { 
            if(this.password==this.passwordConfirm){
                var formData = new FormData();

                formData.append("correo", this.correo);
                formData.append("password", this.password);
                formData.append("nombre", this.nombre);
                formData.append("fechaNacimiento", this.fechaNacimiento);
                formData.append("passwordConfirm", this.passwordConfirm);
                formData.append("telefono", this.telefono);     

                axios.post(site_url + 'api/registro.php', formData, {
                    headers: { 'Content-Type': 'multipart/form-data' }
                }).then(data =>
                    console.log(data)
                ).catch(err => {
                    console.log(err)
                })  
            }
        }
    },
  mounted () {

  }
}
</script>
<style>
    .registro input[type="text"] {
        display: block;
        margin-bottom: 10px;
        padding:10px 15px;
        border: 2px solid white;
        width: 100%;
        background: transparent;
        box-sizing: border-box;
    }
    .registro {
        margin: 0 auto;
        max-width: 300px;
        padding: 35px;
        background: rgba(255, 255, 255, 0.15);
    }
    .registro input[type="text"]::placeholder{
        color: white;
        text-transform: capitalize;

    }
    .registro button {
        width: 100%;
        box-sizing: border-box;
        padding:10px 15px;
        background-color: #7d47bb;
        border: none;
        color: white;
        font-weight: bold;
    }
    
    
</style>