

//registro
new Vue({
    el:"#validaciones",
    data: {
        nombre:"",
        apellido:"",
        celular:"",
        email:"",
        password:"",
        password1:"",
        password2:"",
        ocultar:""
    },
    methods: {
        enviar: function ($nombre,$apellido,$celular,$email,$password){
            this.nombre=$nombre;
            this.apellido=$apellido;
            this.celular=$celular;
            this.email=$email;
            this.password1=$password;
            this.password2=$password;
        }
    }
});
