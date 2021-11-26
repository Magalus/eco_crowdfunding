<template>
    <div>
        <h3>Connexion</h3>
        <form @submit.prevent="addUser">
            <div class="form-group">
                <label >Email</label>
                <input type="email" v-model.trim="form.email" class="form-control" aria-describedby="emailHelp" ref="email" required> 
            </div>
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" v-model.trim="form.password" class="form-control" required>
            </div>
            <button type="submit" class="btn">Se connecter</button>
            <Notification :message="error" v-if="error"/>
        </form>
    </div>
</template>

<script>

export default {
    data() {
        return {
            form: {
                email: '',
                password: ''
            },
            error: undefined
        }
    },
    methods: {
        async addUser() {
            try {
                await this.$auth.login({
                    data: this.form
                });
                this.$router.push({
                    path: '/'
                });
            } catch(e) {
                this.error = e.response.data;
            }
        }
    },
    mounted() {
        this.$refs.email.focus()
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
        width: 100%;
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
}

</style>