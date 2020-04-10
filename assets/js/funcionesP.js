

//productos
new Vue({
    el:"#productos",
    data: {
        show:false,
        show2:false,
        tipoP:"",
        fraceP:"",
        nambreP:"",
        imagenP:"",
        imagenEP:"",
        descripcionP:""
    },
    methods: {
        abrirMEP: function ($idP,$ruta)
        {
            document.getElementById("txtIdP2").value = $idP;
            document.getElementById("txtR").value = $ruta;
        },
        abrirMEditP: function ($tipo,$frace,$nombre,$imagen,$descripcion,$idP)
        {
            this.tipoP= $tipo;
            this.fraceP = $frace;
            this.nambreP = $nombre;
            this.descripcionP = $descripcion.replace(/<br>/g,"\n");
            document.getElementById("txtIdP").value = $idP;
            document.getElementById("txtImagenEP").value = $imagen;
        }
    }
});