<template>
    <div>
        <h3>Créer un compte</h3>
        <form @submit.prevent="registerUser">
            <div class="form-group">
                <label >Nom</label>
                <input type="text" v-model.trim="form.name" class="form-control" aria-describedby="emailHelp" ref="name">
            </div>
            <div class="form-group">
                <label >Email</label>
                <input type="email" v-model.trim="form.email"  class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" v-model.trim="form.password" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirmer le mot de passe</label>
                <input type="password" v-model.trim="form.password_confirmation" class="form-control">
            </div>
            <div >
                Vous avez déjà un compte ? <nuxt-link to="/login">Se connecter</nuxt-link>
            </div>
            <button type="submit" class="btn">S'enregistrer</button>
            <Notification :message="error" v-if="error"/>
        </form>
    </div>
</template>

<script>

import Notification from '~/components/Notification/notification'

export default {
    components: {
        Notification,
    },
    data() {
        return {
            form: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            },
            error: undefined
        }
    },
    methods: {
        async registerUser() {
            try {
                await this.$axios.post('register', this.form);
                this.$auth.login({
                    data: {
                        email: this.form.email,
                        password: this.form.password
                    }
                })
                this.$router.push({
                    path: '/'
                });
            } catch(e) {
                this.error = e.response.data
            }
        }
    },
    mounted() {
        this.$refs.name.focus()
    }
}
</script>


<style lang="scss" scoped>

div {
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 500px;

    h3 {
        margin-bottom: 25px;
    }

    form {
        width: 500px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;

        div {
            &:first-child, &:nth-child(2), &:nth-child(3), &:nth-child(4){
                margin-bottom: 15px;
            }

            &:nth-child(5) {
                margin-bottom: 30px;
                display:inline-block
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
}

</style>