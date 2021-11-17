<template>
    <nav>
        <div>
            <div>
                <nuxt-link to="/">Accueil</nuxt-link>
                <nuxt-link to="/projects">Découvrez les projets</nuxt-link>
                <nuxt-link to="/createProject">Nouveau projet</nuxt-link>
            </div>
            <div>
                <nuxt-link to="/login">Se connecter</nuxt-link>
                <nuxt-link to="/register">S'enregistrer</nuxt-link>
            </div>
        </div>
    </nav>
</template>

<style lang="scss" scoped>

nav {
    display: flex;
    justify-content: center;
    background-color: #5BAB31;
    height: 50px;
    margin-bottom: 50px;

    div {
        display: flex;
        align-items: center;
        width: 100%;
        max-width: 1200px;

        div {
            display: flex;

            &:first-child {
                justify-content: flex-start;

                a {
                    margin-left: 20px;

                    &:first-child {
                        margin-left: 0px;
                    }
                }
            }
            
            &:last-child {
                justify-content: flex-end;

                a {
                    margin-right: 20px;

                    &:last-child {
                        margin-right: 0px;
                    }
                }
            }
        }

        a {
            color: white;
            text-decoration: none;
            font-size: 17px;

            &:hover {
                text-decoration: underline;
            }
        }
    }
}

</style>
