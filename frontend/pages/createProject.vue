<template>
    <form>
        <div class="form-group">
            <label>Titre</label>
            <input type="text" class="form-control" ref="name">
        </div>
        <div class="form-group">
            <label>Résumé</label>
            <textarea class="form-control" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label>Objectif</label>
            <input type="number" class="form-control" value="1000">
        </div>
        <!-- <div class="form-group">
            <label>Ajouter une image</label><br>
            <input type="file" class="form-control-file">
        </div> -->
        <button type="submit" class="btn">Créer le projet</button>
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
        margin-bottom: 15px;


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