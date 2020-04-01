<template>
     <main class="main ">
         <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
         <div class="container-fluid">
             <div>
                  <center>  <h1>Editar Contenido</h1></center>

             </div>
             <br><br>
             <div class="row">
                    <div class="col-2">

                    </div>
                    <div class="col-8">
                            <div  class="form-group row" >
                            <label class="col-md-3 form-control-label" for="text-input">Contenido</label>
                            <div class="col-md-4">
                       <select class="custom-select" ref="seleccionado" >

                                    <option v-for="contenido in array_contenido":key="contenido.id" :value="contenido.id"  v-text="contenido.titulo"></option>


                        </select>
                            </div>
                             <div class="col-md-4">


                                <input type="submit"  @click="informacion()"  class="btn btn-primary" value="Actualizar Contenido">



                            </div>
                            </div>
                    </div>
                    <div class="col-2">

                    </div>

             </div>
                 <div class="row">
                     <div class="col-2">

                     </div>
                     <div class="col-8">
                         <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Titulo</label>
                            <div class="col-md-9">
                                <input type="text" v-model="titulo" class="form-control" placeholder="Titulo " >
                                <span class="help-block">(*) Ingrese el titulo </span>
                            </div>
                        </div>



                    </form>

                     </div>
                     <div class="col-2">

                     </div>
                 </div>

 <div class="form-group row">

                                    <vue-editor class="hola" :customModules="customModulesForEditor"  v-model="content"> </vue-editor>


                        </div>
                            <br><br>
                            <div class="row">
                                <div class="col-4"></div>
                            <div class="col-4">
                                <input type="submit" @click="actualizar()" class="btn btn-primary" value="Actualizar Contenido">
                            </div>
                            <div class="col-4"></div>
                            </div>
                            <br><br><br><br>



         </div>
     </main>
</template>
<script>

const axios= require('axios');
import { VueEditor } from "vue2-editor";
    export default {
        components: { VueEditor },

       data(){
           return{
               content: "<h1>Some initial content</h1>",
            array_contenido:[],
            contenido_id:'',
            titulo:''

           }
       },
       methods:{

            traercontenido(){
                let me= this;
                 axios.post('contenido'
                 ).then(function(response){
                    me.array_contenido=response.data;


                                    }).catch(function(error){
                                            console.log(error);
                                    });
            },
            informacion(){


               let me= this;
               me.contenido_id=this.$refs.seleccionado.value;
                 axios.post('c',{'id':me.contenido_id}
                 ).then(function(response){
                     console.log(response);
                    me.titulo=response.data['titulo'];
                    me.content=response.data['contenido'];


                                    }).catch(function(error){
                                            console.log(error);
                                    });

            },
            actualizar(){
               let me= this;

                 axios.post('actualizarContenido',
                 {'id':me.contenido_id,
                 'titulo':me.titulo,
                 'contenido':me.content}
                 ).then(function(response){
                 //   location.reload();
                   swal.fire('Contenido Actualizado','','success');
                            me.traercontenido();


                                    }).catch(function(error){
                                            console.log(error);
                                    });
            }
        },

        mounted(){
this.traercontenido();

        },created(){
            this.traercontenido();
        }
    }
</script>
<style >
.mostrar{
   display: list-item !important;
   opacity: 1 !important;
   position: absolute !important;
   background-color: #3c29297a !important;
}
.modal-content{
    width: 100% !important;
    position:absolute !important;

}

.modal-body{
    height: 500px;
}
.boxContenedor {


 overflow : auto;
}
.hola{
    width: 100%;
    height: 400px;
}
</style>
