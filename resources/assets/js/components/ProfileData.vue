<template>
    <div class="box">
        <div class="form-group">
            <label >Usuario</label>
            <input type="text" class="form-control" :placeholder="u.name" name="username" >
        </div>
         <div class="form-group">
            <label >Email</label>
            <input type="text" class="form-control" :placeholder="u.email" name="username" disabled>
        </div>
        <div class="form-group">
            <label >Password</label>
            <input type="password" class="form-control" placeholder="Introduce contraseña" name="password" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>


    </div>
    
</template>

<script>

export default {
    data() {
        return {
            u: {}
        };
    },
    beforeMount(){
        auth.reloadLoged()
        this.u=auth.user
    }
}
</script>
<style scoped>
   .box{
        box-shadow: 0 0 0 1px #eaeaea;
        padding: 32px;
        max-width: 340px;
        background-color: #fff;
    }
</style>