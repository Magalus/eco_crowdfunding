<template>
    <div class="projectsList">
        <div class="card" style="width: 18rem;">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
                <h5 class="card-title">Détection de déchets</h5>
                <p class="card-text">Création d'un algorithme pour faciliter le nettoyage des rues</p>
                <nuxt-link :to="{name: 'projects-id', params: {id: 1}}" class="btn btn-primary">En détail</nuxt-link>
                
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
                <h5 class="card-title">Détection de déchets</h5>
                <p class="card-text">Création d'un algorithme pour faciliter le nettoyage des rues</p>
                <nuxt-link :to="{name: 'projects-id', params: {id: 2}}" class="btn btn-primary">En détail</nuxt-link>
                
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
                <h5 class="card-title">Détection de déchets</h5>
                <p class="card-text">Création d'un algorithme pour faciliter le nettoyage des rues</p>
                <nuxt-link :to="{name: 'projects-id', params: {id: 3}}" class="btn btn-primary">En détail</nuxt-link>
                
            </div>
        </div>
    </div>
</template>


<style lang="scss" scoped>

.projectsList {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;

    div {
        margin: 0px 20px 20px 20px;
    }
    
    a {
        width: 100px;
        color: white;
        background-color: #5BAB31;
        border: none;

        &:hover {
            background-color: #6DCC3A;
            color: white
        }
    }
}

</style>
