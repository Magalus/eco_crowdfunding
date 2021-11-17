<template>
    <form>
        <div class="form-group">
            <label >Email</label>
            <input type="email" class="form-control" aria-describedby="emailHelp" ref="email">
        </div>
        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" class="form-control">
        </div>
        <button type="submit" class="btn">Se connecter</button>
    </form>
</template>

<script>

export default {
    mounted() {
        this.$refs.email.focus()
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
        &:first-child {
            margin-bottom: 15px;
        }

        &:nth-child(2) {
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