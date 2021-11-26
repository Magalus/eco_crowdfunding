<template>
    <nav>
        <div>
            <div>
                <nuxt-link to="/">Accueil</nuxt-link>
                <nuxt-link to="/projects">Découvrez les projets</nuxt-link>
                <nuxt-link to="/createProject">Nouveau projet</nuxt-link>
                <nuxt-link to="/admin">Admin</nuxt-link>
            </div>
            <div v-if="!loggedIn">
                <nuxt-link to="/login">Se connecter</nuxt-link>
                <nuxt-link to="/register">S'enregistrer</nuxt-link>
            </div>
            <div v-else>
                <span> Hello {{user.name}} !</span>
                <a @click.prevent="logout">Logout</a>
            </div>
        </div>
    </nav>
</template>


<script>

    export default {
        methods: {
            logout() {
                this.$auth.logout()
            }
        }
    }

</script>


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

                a, span {
                    margin-right: 20px;

                    &:last-child {
                        margin-right: 0px;
                    }
                }
            }
        }

        a {
            color: white !important;
            text-decoration: none !important;
            font-size: 17px !important;

            &:hover {
                text-decoration: underline !important;
                cursor: pointer;
            }
        }

        span {
            font-size: 17px;
        }
    }
}

</style>
