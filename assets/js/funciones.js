var hoy = new Date();
var meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "novimbre", "diciembre"];


//Calendario
new Vue({

    el: "#calendario",
    data: {
        //Varibles para calendario
        name: meses[hoy.getMonth()],
        mes: hoy.getMonth() + 1,
        ano: hoy.getFullYear(),
        diaA: hoy.getDate(),
        mesA: hoy.getMonth() + 1,
        anA: hoy.getFullYear(),
        p: hoy.getDay() ,
        dias: new Date(hoy.getFullYear(), hoy.getMonth()+1, 0).getDate(),
        a: "",
        direccionE:"",
        horaE:"",
        descripcionE:""
    },
    methods: {
        aumentarMes: function ()
        {
            if (this.mes != 12)
            {
                this.mes++;
            } else
            {
                this.ano++;
                this.mes = 1;
            }
            this.dias = new Date(this.ano, this.mes, 0).getDate();
            this.name = meses[this.mes - 1];

            var dt = new Date(this.ano, this.mes - 1, 0);
            this.p = dt.getDay() + 1;
        },
        disminuirMes: function ()
        {
            if (this.mes == hoy.getMonth() + 1 && this.ano == hoy.getFullYear())
            {
                //si es el mismo més y el mismo año, no se podra acceder a los años posteriores
            } else
            {
                if (this.mes != 1)
                {
                    this.mes--;
                } else
                {
                    this.mes = 12;
                    this.ano--;
                }
                this.dias = new Date(this.ano, this.mes, 0).getDate();
                this.name = meses[this.mes - 1];
                var dt = new Date(this.ano, this.mes - 1, 0);
                this.p = dt.getDay() + 1;
            }
        },
        abrirModal: function ($dia)
        {
            document.getElementById("txtFecha").value = this.ano +"-"+this.mes+"-"+$dia;
        },
        abrirMEE: function ($idE)
        {
            document.getElementById("txtIdE").value = $idE;
        },
        abrirMEditE: function ($dire,$hora,$descrip,$idE, $dia)
        {
            this.direccionE= $dire;
            this.horaE = $hora;
            this.descripcionE = $descrip.replace(/<br>/g,"\n");;
            document.getElementById("txtIdEE").value = $idE;
            document.getElementById("txtFechaE").value = this.ano +"-"+this.mes+"-"+$dia;
        }
    }
});

//Registrar Evento
new Vue({
    el:"#modalAgendarE",
    data: {
        direccionE:"",
        horaE:"",
        descripcionE:""
    }
});
