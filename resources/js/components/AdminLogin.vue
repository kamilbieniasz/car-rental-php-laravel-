<template>
  <div class="login-page">
    <h1 class="login-page__title">Logowanie</h1>
    <form class="login-form">
      <span class="login-form__item">
        <i class="fas fa-user login-form__item--icon"></i>
        <input
          id="username"
          type="text"
          class="login-form__item--input"
          placeholder="username"
          v-model="username"
        />
      </span>
      <span class="login-form__item">
        <i class="fas fa-lock login-form__item--icon"></i>
        <input
          id="password"
          type="password"
          class="login-form__item--input"
          placeholder="password"
          v-model="password"
        />
      </span>
      <button
        type="button"
        @click="login()"
        class="login-form__item login-form__item--button"
      >
      
        Zaloguj się
      </button>
    </form>
  </div>
</template>
<script>
import axios from 'axios'
import '../../sass/admin-login.scss'

const URL = "http://127.0.0.1:8000/api/";

export default {
  name: "AdminLogin",
  data() {
    return {
      username: '',
      password: '',
    };
  },
  methods: {
    login(){
      axios.post(URL + "admin/login",{
        username: this.username,
        password: this.password
      })
        .then((response) => {
          if(response){
            localStorage.setItem("ADMIN_ID", response.data.id);
            localStorage.setItem("ADMIN_NAME", response.data.username);
            localStorage.setItem("ADMIN_EMAIL", response.data.email);
            this.$router.push({ path: 'cars' });
          }
        })
        .catch((error) => {
          console.log(error);
        })
    }
  },
};
</script>
<style lang="scss" scoped>
.login-page{
    width:100vw;
    min-height:100vh;
    background-image: url('../../../public/assets/image/login.jpg');
    background-size:cover;
    background-position: center;
    background-repeat: no-repeat;
    display:flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    .login-page__title{
        color:white;
        border-bottom: 2px solid white;
        user-select: none;
        // transform: translateX(-120%);
        // font-size:25px;
    }

    .login-form{
        min-height: 40vh;
        display:flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        // border: 2px solid white;
        padding:60px 30px;

        .login-form__item{
            display:flex;
            justify-content: center;
            align-items: center;
            
            .login-form__item--icon{
                color:white;
            }

            .login-form__item--input{
                height:30px;
                margin:20px 0;
                background-color:transparent;
                border:none;
                color:white;
                padding:0 15px;
                display:flex;
                justify-content: center;
                font-size:20px;
                
                &:focus{
                    outline: none;
                }
            }
        }

        .login-form__item--button{
            padding:15px 40px;
            display:flex;
            justify-content: center;
            align-items: center;
            background-color:transparent;
            border:2px solid white;
            color: white;
            cursor: pointer;
            font-size:20px;
            margin:20px 0;
            transition:.4s ease-in-out;

            &:focus{
                outline: none;
            }
            &:hover{
                background-color:white;
                color: black;
                transition:.4s ease-in-out;
                cursor: pointer;
            }
        }
        .login-form__item--register-button{
            color:white;
            padding:20px 0;
            a{
                text-decoration: none;
                color:white;
                user-select: none;
            }
        }
    }
}

::placeholder{
    color:white;
}
::-webkit-input-placeholder {
    text-align: center;
}

@media screen and (max-width:1000px){
    .login-form{
        margin:0 !important;
        padding:0 !important;
    }
}
</style>