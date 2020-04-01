
<template >
   <main class="main ">
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
                <i class="fa fa-align-justify"></i> Asignar Archivo
                <button @click="abrirModal('slider','registrar')" type="button" class="btn btn-secondary" >
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </button>
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
                            <th>Titulo del Tramite</th>
                            <th>Nombre del archivo</th>




                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="slider in arraySlider" :key="slider.id" >
                             <td>

                                <button @click="eliminarSlider(slider.id)" type="button" class="btn btn-danger btn-sm" >
                                  <i class="icon-trash"></i>
                                </button>
                            </td>
                            <td v-text="slider.titulo"></td>
                             <td >
                                 <a :href="slider.url" v-text="slider.nombre"></a>
                             </td>


                            <td>


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
            <div class="modal-content n">
                <div class="modal-header">
                    <h4 class="modal-title" v-text="tituloModal"></h4>
                    <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body boxContenedor">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                        <div  class="form-group row" v-if="tramites!=null">
                            <label class="col-md-3 form-control-label" for="text-input">Tramite</label>
                            <div class="col-md-9">
                        <select class="custom-select" v-model="tramite" >

                                    <option v-for="slider in tramites" :key="slider.id" :value="slider.id"  v-text="slider.titulo"></option>


                        </select>
                            </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                             <div  class="form-group row" v-if="archivos!=null">
                            <label class="col-md-3 form-control-label" for="text-input">Archivos</label>
                            <div class="col-md-9">
                        <select class="custom-select" v-model="archivo" >

                                    <option v-for="slider in archivos" :key="slider.id" :value="slider.id"  v-text="slider.nombre"></option>


                        </select>
                            </div>
                            </div>




                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" @click="registrarSlider()" class="btn btn-primary" v-if="boton==1">Guardar</button>
                    <button type="button" class="btn btn-primary" v-if="boton==2" @click="actualizarSlider()">Actualizar</button>
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
            <div class="modal-content">
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
               content: "<h1>Some initial content</h1>",
               categorias:[],
               tramites:[],
               tramite:'Elije uno',
               archivos:[],
               archivo:[],
               categoria:'',
               titulo : '',
               url :'',
               fecha:'',
               descripcion:'',
               arraySlider: [],
                arraySlider2: [],
               modal:0,
               tituloModal:'',
               boton:0,
               image:'',
               imagen:'',
               id:0,
               offset:3,
               buscar:'',
               pagination: {
                    'total':0,
                'current_page':0,
                'per_page':0,
                'last_page':0,
                'from' :0,
                'to':0,
               },
               lugar:''
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
               var url="admin/tramitesporarchivo?page="+page + "&buscar="+buscar;

            let me= this;
               axios.get(url)
                .then(function (response) {
                    var respuesta= response.data;
                     me.arraySlider= respuesta.data;
                     me.pagination= respuesta;
    // handle success
                console.log(response);
                 })
                .catch(function (error) {
    // handle error
                console.log(error);
                })
            },
             eliminarSlider(idi){
                 console.log(idi);
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
      axios.post('admin/tramitesporarchivoEliminar',{

                    'id':idi
                }).then(function(response){
                        console.log(response.data);
                          swal.fire(
      'Borrado!',
      'Has borrado la asignacion de este archivo.',
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

            ,registrarSlider(){

                                    let me = this;

   console.log(this.tramite);
                                axios.post('admin/archivo_tramite/registera_t',{


                                    'id2': this.tramite,
                                    'id1': this.archivo,

                                }).then(function(response){
                                        console.log(response.data);
                                    if(response.data!=1){
                                        swal.fire('Ya asigno este archivo a este tramite','','error');

                                    }
                                    else{
                                          swal.fire('Archivo Asignado','','success');
                                           me.listarSlider(1,'');
                                    me.cerrarModal();
                                    }



                                    }).catch(function(error){
                                        console.log(error);
                                    });

        }, actualizarSlider(){
            let me =this;

                axios.post('admin/tramite/updatedTramite',{

                                    'titulo':this.titulo,
                                     'categoria': this.categoria,


                                    'contenido':this.content,
                    'id':this.id,

                }).then(function(response){
                        console.log(response.data)
                         swal.fire('Actualizadi','','success');
                                    me.listarSlider(1,'');
                                    me.cerrarModal();
                }).catch(function(error){
                    console.log(error);
                })


        }, listarCategorias(){
             let me=this;
 axios.post('admin/tramite/Categorias').then(function(response){

 me.categorias=response.data;


                }).catch(function(error){
                    console.log(error);
                })
        },
         listarTramites(){
             let me=this;
 axios.post('admin/archivo_tramite/tramites').then(function(response){
console.log("aqui")
me.tramites=response.data;
console.log(response);


                }).catch(function(error){
                    console.log(error);
                })
        },
        listarArchivos(){
             let me=this;
 axios.post('admin/archivo_tramite/archivos').then(function(response){
console.log("aqui")
me.archivos=response.data;
console.log(response);


                }).catch(function(error){
                    console.log(error);
                })
        },
        abrirModal(modelo,accion,data=[]){
              this.listarCategorias();
              this.listarTramites();
              this.listarArchivos();
                            switch(modelo){
                                case "slider":
                                    {
                                        switch(accion){
                                            case 'registrar':
                                                {
                                                    this.modal=1;
                                                    this.tituloModal='Asignar Archivo';
                                                    this.titulo='';
                                                    this.url='';
                                                    this.boton=1;

                                                    break;
                                                }
                                            case 'actualizar':
                                                {
                                                    this.modal=1;
                                                    this.tituloModal='Asignar Archivo';
                                                    this.boton=2;

                                                    this.content=data['description'];
                                                    this.titulo=data['titulo'];
                                                    this.categoria=data['categoria_id'];
                                                    this.id=data['id'];

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
              this.listarCategorias();
              this.listarTramites();
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
.boxContenedor {

 width : 800px;
            height : 430px;
            overflow : auto;
}
.n{
     height: 500px;
}
</style>
