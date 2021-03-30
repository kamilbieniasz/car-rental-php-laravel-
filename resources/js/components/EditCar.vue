<template>
    <div class="edit-car">
        <i class="fas fa-times close-btn" @click="close()"></i>
        <h2 class="title">Edytuj samochód</h2>
        <form>
            <p>
                <label for="mark">Marka</label> <input :value="car.mark" @input="changeValue('mark', $event)" id="mark" required>
            </p>
            <p>
                <label for="model">Model</label> <input :value="car.model" @input="changeValue('model', $event)" id="model" required>
            </p>
            <p>
                <label for="enigne_capacity">Pojemność silnika</label> <input :value="car.engine_capacity" @input="changeValue('engine_capacity', $event)" id="enigne_capacity" required>
            </p>
            <p>
                <label for="type">Typ nadwozia</label> <input :value="car.type" @input="changeValue('type', $event)" id="type" required>
            </p>
            <p>
                <label for="year">Rok produkcji</label> <input :value="car.year" @input="changeValue('year', $event)" id="year" required>
            </p>
            <p>
                <label for="color">Kolor</label> <input :value="car.color" @input="changeValue('color', $event)" id="color" required>
            </p>
            <p>
                <label for="location">Lokacja</label> <input :value="car.location" @input="changeValue('location', $event)" id="location" required>
            </p>
            <p>
                <label for="price">Cena</label> <input :value="car.price" @input="changeValue('price', $event)" id="price" required>
            </p>
            <p>
                <label for="image">Zdjęcie (link)</label> <input :value="car.image" @input="changeValue('image', $event)" id="image" required>
            </p>
            <p>
                <label for="description">Opis</label> <input :value="car.description" @input="changeValue('description', $event)" id="description" required>
            </p>
            
        </form>
        <button class="add-car-btn" @click="updateCarList()">Edytuj samochód</button>
    </div>
</template>
<script>
import axios from 'axios';

const URL = "http://127.0.0.1:8000/api/";

export default {
    name: "EditCar",
    props: ['car'],
    data(){
        return{
            currentCar: {
                mark: '',
                model: '',
                engine_capacity: '',
                type: '',
                year: '',
                color: '',
                location: '',
                price: '',
                image: '',
                description: ''
            },
            columnName: [],
            newValue: []
        };
    },
    methods: {
        close() {
            const editCarWindow = document.querySelector('.edit-car');
            editCarWindow.style.display = 'none';
            
        },
        updateCarList() {
            // this.mark = this.car.mark;
            // this.model = this.car.model;
            // this.engine_capacity = this.car.engine_capacity;
            // this.type = this.car.type;
            // this.year = this.car.year;
            // this.color = this.car.color;
            // this.location = this.car.location;
            // this.price = this.car.price;
            // this.image = this.car.image;
            // this.description = this.car.description;
            // console.log(this.mark);
            // console.log(this.model);
            // console.log(this.engineCapacity);
            // console.log(this.type);
            // console.log(this.year);
            // console.log(this.color);
            // console.log(this.location);
            // console.log(this.price);
            // console.log(this.image);
            // console.log(this.description);

            Object.keys(this.currentCar).forEach((key) => {
                // console.log(key, this.currentCar[key]);
                if(this.currentCar[key]){
                    this.columnName.push(key);
                    this.newValue.push(this.currentCar[key]);
                    // console.log(this.currentCar[key])
                }
            });
            console.log(this.car.id);

            const editedCar = {
                id: this.car.id,
                columnName: this.columnName,
                newValue: this.newValue
            };
            
            // let config = {
            //     headers: {
            //         "Content-Type": "application/json"
            //     }
            // }

            axios.patch(URL + 'car/update', editedCar, {headers: { 'Content-Type': 'application/json'}})
                .then(this.handleCarList())
                .then(this.close())
                .catch(error => {
                    console.log(error);
                })
        },
        changeValue(value, event){
        //     switch(value){
        //         case "mark":
        //             this.mark = event.target.value;
        //             this.columnName.push(value);
        //             break;
        //         case "model":
        //             this.model = event.target.value;
        //             this.columnName.push(value);
        //             break;
        //         case "engineCapacity":
        //             this.engineCapacity = event.target.value;
        //             this.columnName.push('engine-capacity');
        //             break;
        //         case "type":
        //             this.type = event.target.value;
        //             this.columnName.push(value);
        //             break;
        //         case "year":
        //             this.year = event.target.value;
        //             this.columnName.push(value);
        //             break;
        //         case "color":
        //             this.color = event.target.value;
        //             this.columnName.push(value);
        //             break;
        //         case "location":
        //             this.location = event.target.value;
        //             this.columnName.push(value);
        //             break;
        //         case "price":
        //             this.price = event.target.value;
        //             this.columnName.push(value);
        //             break;
        //         case "image":
        //             this.image = event.target.value;
        //             this.columnName.push(value);
        //             break;
        //         case "description":
        //             this.description = event.target.value;
        //             this.columnName.push(value);
        //             break;
        //     }
        // }

        //eval.apply(this, value + " = " + event.target.value);

        //this.handleCarById();
        const name = "this."+value;
        this.currentCar[value] = event.target.value;

        //eval(name + " = " + event.target.value);
        //console.log(eval("this."+value));
         console.log(this.currentCar.mark);
            console.log(this.currentCar.model);
            console.log(this.currentCar.engine_capacity);
            console.log(this.currentCar.type);
            console.log(this.currentCar.year);
            console.log(this.currentCar.color);
            console.log(this.currentCar.location);
            console.log(this.currentCar.price);
            console.log(this.currentCar.image);
            console.log(this.currentCar.description);
        },
        handleCarList(){
            this.$emit('handleCarList', {methodCall: 'handleCarList'});
        }
    },
}
</script>
<style lang="scss" scoped>
    .edit-car{
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