<template>
    <div class="add-car">
        <i class="fas fa-times close-btn" @click="close()"></i>
        <h2 class="title">Dodaj samochód</h2>
        <form>
            <p>
                <label for="mark">Marka</label> <input v-model="mark" id="mark" required>
            </p>
            <p>
                <label for="model">Model</label> <input v-model="model" id="model" required>
            </p>
            <p>
                <label for="enigne_capacity">Pojemność silnika</label> <input v-model="engineCapacity" id="enigne_capacity" required>
            </p>
            <p>
                <label for="type">Typ nadwozia</label> <input v-model="type" id="type" required>
            </p>
            <p>
                <label for="year">Rok produkcji</label> <input v-model="year" id="year" required>
            </p>
            <p>
                <label for="color">Kolor</label> <input v-model="color" id="color" required>
            </p>
            <p>
                <label for="location">Lokacja</label> <input v-model="location" id="location" required>
            </p>
            <p>
                <label for="price">Cena</label> <input v-model="price" id="price" required>
            </p>
            <p>
                <label for="image">Zdjęcie (link)</label> <input v-model="image" id="image" required>
            </p>
            <p>
                <label for="description">Opis</label> <input v-model="description" id="description" required>
            </p>
            
        </form>
        <button class="add-car-btn" @click="addCar()">Dodaj samochód</button>
    </div>
</template>
<script>
import axios from 'axios';

const URL = "http://127.0.0.1:8000/api/";

export default {
    name: "AddCar",
    data(){
        return{
            mark: '',
            model: '',
            engineCapacity: '',
            type: '',
            year: '',
            color: '',
            location: '',
            price: '',
            image: '',
            description: ''
        };
    },
    methods: {
        close() {
            const addCarWindow = document.querySelector('.add-car');
            addCarWindow.style.display = 'none';
        },
        addCar() {
            const addCar = document.querySelector('.add-car');

            const car = {
                mark: this.mark,
                model: this.model,
                engineCapacity: this.engineCapacity,
                type: this.type,
                year: this.year,
                color: this.color,
                location: this.location,
                price: this.price,
                image: this.image,
                description: this.description
            }
            console.log(car);
            

            axios.post(URL + 'car/add', car)
                .then(addCar.style.display = 'none')
                .then(this.clearInputs())
                .then(this.close())
                .then(this.handleCarList())
                .catch(error => console.log(error));
        },
        clearInputs(){
            this.mark = '';
            this.model = '';
            this.engineCapacity = '';
            this.type = '';
            this.year = '';
            this.color = '';
            this.location = '';
            this.price = '';
            this.image = '';
            this.description = '';
        },
        handleCarList(){
            this.$emit('handleCarList', {methodCall: 'handleCarList'});
        }
    }
}
</script>
<style lang="scss" scoped>
    .add-car{
        width:60vw;
        height:60vh;
        background-color: white;
        border:3px solid black;
        border-radius: 15px;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;

        .close-btn{
            font-size:40px;
            position: absolute;
            right:10px;
            top:5px;
            cursor: pointer;
        }

        .title{
            text-align: center;
        }

        form{
            width:100%;
            display:grid;
            grid-template-columns: repeat(2, 1fr);

            p{
                width:65%;
                display:grid;
                grid-template-columns: repeat(2, 1fr);
                justify-self: center;
                align-self: center;
            }
        }
        .add-car-btn{
            padding: 10px 20px;
            background-color: transparent;
            border: 3px solid black;
            border-radius: 15px;
        }
    }
</style>
