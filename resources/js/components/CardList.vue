<template>
  <div class="container mt-4">
    <h2>{{ title }}</h2>
    <div class="row">
      <div class="col-md-6" v-for="card in cards" :key="card.id">
        <Card
          :title="card.title"
          :description="card.description"
          :headerColor="card.color"
          :buttonText="card.buttonText"
          buttonClass="btn-success"
          @card-action="onCardAction"
        />
      </div>
    </div>

    <div v-if="actions.length > 0" class="mt-5 alert alert-info">
      <h4>Últimas acciones:</h4>
      <ul>
        <li v-for="(action, index) in actions" :key="index">
          {{ action.title }} - {{ action.timestamp }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import Card from './Card.vue'

export default {
  name: 'CardList',
  components: {
    Card
  },
  data() {
    return {
      title: 'Lista de Tarjetas',
      actions: [],
      cards: [
        {
          id: 1,
          title: 'Tarjeta 1',
          description: 'Esta es la primera tarjeta de demostración',
          color: '#007bff',
          buttonText: 'Ver más'
        },
        {
          id: 2,
          title: 'Tarjeta 2',
          description: 'Esta es la segunda tarjeta de demostración',
          color: '#28a745',
          buttonText: 'Explorar'
        },
        {
          id: 3,
          title: 'Tarjeta 3',
          description: 'Esta es la tercera tarjeta de demostración',
          color: '#dc3545',
          buttonText: 'Descargar'
        },
        {
          id: 4,
          title: 'Tarjeta 4',
          description: 'Esta es la cuarta tarjeta de demostración',
          color: '#ffc107',
          buttonText: 'Compartir'
        }
      ]
    }
  },
  methods: {
    onCardAction(actionData) {
      this.actions.unshift({
        title: actionData.title,
        timestamp: actionData.timestamp.toLocaleTimeString()
      })
      
      // Mantener solo las últimas 5 acciones
      if (this.actions.length > 5) {
        this.actions.pop()
      }
    }
  }
}
</script>

<style scoped>
h2 {
  margin-bottom: 30px;
  color: #333;
  border-bottom: 2px solid #007bff;
  padding-bottom: 10px;
}
</style>