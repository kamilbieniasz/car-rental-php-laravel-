<template>
  <div class="container">
    <ul class="car-list">
      <li v-for="(car, index) in carList" :key="index" class="car">
        <img :src="car.image" />
        <span class="info-container">
          <h2 class="name">{{ car.mark }} {{ car.model }}</h2>
          <span class="grid-container">
            <p class="engine-cap">
              <i class="fas fa-tools"></i> {{ car.engine_capacity }}
            </p>
            <p class="type"><i class="fas fa-car"></i> {{ car.type }}</p>
            <p class="year">
              <i class="fas fa-calendar-alt"></i> {{ car.year }}
            </p>
            <p class="color">
              <i class="fas fa-paint-brush"></i> {{ car.color }}
            </p>
            <p class="location">
              <i class="fas fa-building"></i> {{ car.location }}
            </p>
            <p class="price">
              <i class="fas fa-dollar-sign"></i> {{ car.price }}
            </p>
          </span>
          <p class="description">{{ car.description }}</p>
        </span>
        <span class="controls">
          <i class="fas fa-edit" @click="openEditCarWindow(index)"></i>
          <i class="fas fa-trash-alt" @click="deleteCar(index)"></i>
        </span>
      </li>
    </ul>
    <button class="add-new-car-btn" @click="openAddCarWindow()">
      Dodaj nowy samochód
    </button>
    <editCar v-if="openEditCar" v-on:handleCarList="handleCarList" :car="currentCar"></editCar>
    <addCar v-if="openAddCar" v-on:handleCarList="handleCarList"></addCar>
  </div>
</template>
<script>
import axios from "axios";

const URL = "http://127.0.0.1:8000/api/";

export default {
  name: "AdminCars",
  data() {
    return {
      carList: [],
      currentCar: '',
      openEditCar: false,
      openAddCar: false
    };
  },
  methods: {
    handleCarList() {
      axios
        .get(URL + "cars")
        .then((response) => {
          if (response) {
            this.carList = response.data;
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    openAddCarWindow() {
      //const carAddWindow = document.querySelector(".add-car");
      //carAddWindow.style.display = "flex";
      this.openAddCar = !this.openAddCar;
    },
    deleteCar(id) {
      const carId = this.carList[id].id;

      axios.delete(URL + "car/" + carId)
        .then(this.handleCarList())
        .catch((error) => console.log(error));
    },
    openEditCarWindow(id){
      //const editCarWindow = document.querySelector(".edit-car");
      //editCarWindow.style.display = "flex";
      this.openEditCar = !this.openEditCar; 
      this.currentCar = this.carList[id];
    },
    handleCarById(){
      return this.currentCar;
    }
  },
  created() {
    this.handleCarList();
  },
};
</script>

<style lang="scss" scoped>
.container {
  display: flex;
  flex-direction: column;
  align-items: center;

  .car-list {
    margin: 0;
    padding: 0;
    list-style-type: none;
    .car {
      display: flex;
      justify-content: space-around;
      margin: 10px 0;
      padding: 10px;
      border: 1px solid black;
      img {
        width: 25%;
      }
      .info-container {
        width: 60%;
        display: flex;
        flex-direction: column;
        align-items: center;

        .grid-container {
          width: 50%;
          display: grid;
          text-align: center;
          grid-template-columns: repeat(3, 1fr);
        }
      }
      .controls {
        display: flex;
        justify-content: center;
        align-items: center;

        .fas {
          font-size: 30px;
          margin: 15px;
          cursor: pointer;
        }

        .fa-edit {
          color: #116fca;
        }

        .fa-trash-alt {
          color: #ef450d;
        }
      }
    }
  }

  .add-new-car-btn {
    padding: 10px 20px;
    background-color: transparent;
    border: 3px solid black;
    border-radius: 15px;
  }
}
.add-car, .edit-car {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translateY(-50%) translateX(-50%);
  display: flex;
}
</style>
