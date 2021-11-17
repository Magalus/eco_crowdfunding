<template>
    <form>
        <div class="form-group">
            <label >Nom</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" ref="name">
        </div>
        <div class="form-group">
            <label >Email</label>
            <input type="email" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" class="form-control">
        </div>
        <div class="form-group">
            <label>Confirmer le mot de passe</label>
            <input type="password" class="form-control">
        </div>
        <button type="submit" class="btn">S'enregistrer</button>
    </form>
</template>

<script>

export default {
    mounted() {
        this.$refs.name.focus()
    }
}

</script>


<style lang="scss" scoped>

form {
    width: 500px;
    display: flex;
    flex-direction: column;
    justify-content: space-around;

    div {
        &:first-child, &:nth-child(2), &:nth-child(3) {
            margin-bottom: 15px;
        }

        &:nth-child(4) {
            margin-bottom: 30px;
        }
    }

    button {
        width: 150px;
        color: white;
        background-color: #5BAB31;

        &:hover {
            background-color: #6DCC3A;
            color: white
        }
    }
}

</style>