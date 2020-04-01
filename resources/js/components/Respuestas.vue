<template>
   <main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Historial de Respuestaas

            </div>
            <div class="card-body">
                <div class="form-group row">
                     <div class="col-md-6">
                        <div class="input-group">

                            <input  type="text" @keyup.enter="listarSlider(1,buscar)" v-model="buscar" class="form-control" placeholder="Texto a buscar">
                            <button type="submit" @click="listarSlider(1,buscar)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Correo</th>



                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="slider in arraySlider" :key="slider.id" >
                             <td>
                                <button @click="abrirModal('slider','actualizar',slider)" type="button" class="btn btn-warning btn-sm" >
                                  <i class="icon-pencil"></i>
                                </button> &nbsp;

                            </td>
                            <td v-text="slider.nombre"></td>
                            <td v-text="slider.correo"></td>



                                <div >

<span  v-if="slider.estado" class="badge badge-success">Respondido</span>


                                            <span  v-else class="badge badge-danger">Nuevo</span>
                                                       </div>

                            </td>
                        </tr>

                    </tbody>
                </table>
                <nav>
                    <ul class="pagination">
                        <li class="page-item" v-if="pagination.current_page>1">
                            <a class="page-link" @click.prevent="cambiarPagina(pagination.current_page -1,buscar)"  href="#">Ant</a>
                        </li>
                        <li class="page-item " v-for="page in pagesNumber" :key="page" :class="[page==isActived ? 'active' : '']">
                            <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar)" v-text="page">1</a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" @click.prevent="cambiarPagina(pagination.current_page +1,buscar)" href="#" v-if="pagination.current_page < pagination.last_page">Sig</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar/actualizar-->
    <div class="modal fade"  tabindex="-1" :class="{'mostrar':modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content" id="slider">
                <div class="modal-header">
                    <h4 class="modal-title" v-text="tituloModal"></h4>
                    <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body boxContenedor">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                          <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Mensaje</label>
                            <div class="col-md-9">
                                <textarea  cols="80" rows="7" disabled v-text="mensaje" ></textarea>
                            </div>
                        </div>

                      <div class="col-md-12">
                                    <vue-editor disabled :customModules="customModulesForEditor" v-model="content"> </vue-editor>

                            </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" @click="registrarSlider()" class="btn btn-primary" v-if="boton==1">Guardar</button>
                    <button type="button" class="btn btn-primary" v-if="boton==2" @click="actualizarSlider()">Responder</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->
    <!-- Inicio del modal Eliminar -->
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content slider" >
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Estas seguro de eliminar la categoría?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Fin del modal Eliminar -->

</main>
</template>

<script>

    const axios= require('axios');
import { VueEditor } from "vue2-editor";
    export default {
        components: { VueEditor },
       data(){
           return{
               titulo : '',
               content:'',
               url :'',
               visible: 0,
               auxvis:0,
               arraySlider: [],
               modal:0,
               tituloModal:'',
               boton:0,
               image:'',
               imagen:'',
               id:0,
               offset:3,
               buscar:'',
               nombre:'',
               telefono:'',
               correo:'',
               estado:'',
               mensaje:'',
               pagination: {
                    'total':0,
                'current_page':0,
                'per_page':0,
                'last_page':0,
                'from' :0,
                'to':0,
               }
           }
       }, computed:{
            isActivated : function(){
                return this.pagination.current_page;
            },
            pagesNumber: function(){
                if(!this.pagination.to){
                    return [];
                }
                var from= this.pagination.current_page- this.offset;
                if(from<1){
                    from=1;
                }
                var to= from+ (this.offset *2);
                if(to >= this.pagination.last_page){
                    to=this.pagination.last_page;
                }
                var pagesArray=[];
                while(from<=to){
                    pagesArray.push(from);
                    from++;
                }
               return pagesArray;
            }
       },
       methods:{
           listarSlider(page,buscar){
               var url="admin/mensaje2?page="+page + "&buscar="+buscar;

            let me= this;
               axios.get(url)
                .then(function (response) {
                    var respuesta= response.data;
                     me.arraySlider= respuesta.sliders.data;
                     me.pagination= respuesta.pagination;
    // handle success
                console.log(response);
                 })
                .catch(function (error) {
    // handle error
                console.log(error);
                })
            },
             eliminarSlider(idi){
    let me = this;

                swal.fire({
  title: '¿Está seguro?',
  text: "¿Quieres borrarlo?",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'si, Borralo!'
}).then((result) => {
  if (result.value) {
      axios.post('admin/slider/deletedSlider',{

                    'id':idi
                }).then(function(response){
                        console.log(response.data);
                          swal.fire(
      'Borrado!',
      'Tu slider ha sido borrado.',
      'success'
    );

    me.listarSlider(1,'');

                }).catch(function(error){
                    console.log(error);
                })

  }
})

             },
             cambiarPagina(page,buscar){
                 let me=this;
                 me.pagination.current_page=page;
                me.listarSlider(page,buscar);
             }

            ,imageChanged(e){

                                var filereader= new FileReader();
                                filereader.readAsDataURL(e.target.files[0]);
                                filereader.onload = (e)=>{
                                        this.image= filereader.result;
                                };

                                const files = e.target.files;

                                this.image=files;
            }
        ,registrarSlider(){

                                    let me = this;
                                if(this.titulo==''){

                                }else if(this.image==''){
                                swal.fire('Falta ingresar la imagen','','error');

                                }else{
                                axios.post('admin/slider/registerSlider',{
                                    'algo':this.image,
                                    'titulo':this.titulo
                                }).then(function(response){
                                    if(response.data==-1){
                                        swal.fire('revise el tamaño de la imagen debe ser de ancho 1500 y alto 500','','error');
                                    }else {
                                     swal.fire('slider registrado','','success');
                                    me.listarSlider(1,'');
                                    me.cerrarModal();
                                    }
                                    }).catch(function(error){
                                        console.log(error);
                                    });
                            }
        }, actualizarSlider(){
            let me =this;

                axios.post('admin/correo',{

                    'mensaje': this.mensaje,
                    'id':this.id,
                    'correo':this.correo,
                    'respuesta':this.content
                }).then(function(response){

                        console.log(response.data)



                         swal.fire('Mensaje respondido,Actualice la página !!!','','success');
                                    me.listarSlider(1,'');
                                    me.cerrarModal();
                                    location.reload();
                }).catch(function(error){
                    console.log(error);
                })



        },
        abrirModal(modelo,accion,data=[]){
                            switch(modelo){
                                case "slider":
                                    {
                                        switch(accion){
                                            case 'registrar':
                                                {
                                                    this.modal=1;
                                                    this.tituloModal='Registrar Slider';
                                                    this.titulo='';
                                                    this.url='';
                                                    this.boton=1;
                                                    break;
                                                }
                                            case 'actualizar':
                                                {
                                                    this.modal=1;
                                                    this.tituloModal='Responder Mensaje';
                                                    this.boton=2;
                                                    this.nombre=data['nombre'];
                                                    this.correo=data['correo'];
                                                    this.telefono=data['telefono'];
                                                    this.estado=data['estado'];
                                                    this.mensaje=data['mensaje'];
                                                        this.content=data['respuesta'];
                                                    this.id=data['id'];
                                                    this.auxvis=data["visibilidad"]
                                                    break;
                                                }

                                        }
                                    }
                            }

        }, cerrarModal(){
                            this.modal=0;
                            this.tituloModal='';
                            this.titulo='';
                            this.url='';
        }


        },

        mounted(){

            this.listarSlider(1,this.buscar);
            this.abrirModal();
            this.imageChanged();
            actualizarSlider();
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
.imagensita{
    width: 400px;
    height: 150px;
    text-align: center;
}
#slider{
     height: 540px;
}
#usuario{
    height: 350px !important;
}
</style>
