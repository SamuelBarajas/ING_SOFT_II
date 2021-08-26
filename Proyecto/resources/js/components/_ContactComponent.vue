<template>
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-header">
                <img width="230" src="/images/contacto.png" class="mx-auto d-block" alt="">
            </div>
            <div class="card-body">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nombre</span>
                    </div>
                    <input type="text" class="form-control" v-model="name">
                </div>
                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email</span>
                    </div>
                    <input type="email" class="form-control" v-model="email">
                </div>
                <div class="input-group mt-3">
                    <textarea class="form-control" placeholder="Comentario" v-model="comentario"></textarea>
                </div>

                <button @click="saveContact" class="btn btn-primary mt-3 btn-lg">Guardar</button>

            </div>
        </div>
    </div>
</template>
<script>
export default {
    created() {
    },
    methods:{
        saveContact: function(){
            return
            /*fetch('/api/post/' + this.$route.params.id).then(response => response.json())
            .then(json => this.post = json.data);*/
        }
    },
      data: function () {
      return {
          name: "",
          email: "",
          comentario: ""
      };
    },
};
</script>
