<template>
  <div class="card">
    <div class="card-header" :style="{ backgroundColor: headerColor }">
      <h5 class="card-title">{{ title }}</h5>
    </div>
    <div class="card-body">
      <p class="card-text">{{ description }}</p>
      <button
        v-if="showButton" 
        @click="handleAction"
        class="btn"
        :class="buttonClass"
      >
        {{ buttonText }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Card',
  props: {
    title: {
      type: String,
      required: true
    },
    description: {
      type: String,
      required: true
    },
    headerColor: {
      type: String,
      default: '#007bff'
    },
    showButton: {
      type: Boolean,
      default: true
    },
    buttonText: {
      type: String,
      default: 'Acción'
    },
    buttonClass: {
      type: String,
      default: 'btn-primary'
    }
  },
  emits: ['card-action'],
  methods: {
    handleAction() {
      this.$emit('card-action', {
        title: this.title,
        timestamp: new Date()
      })
    }
  }
}
</script>

<style scoped>
.card {
  margin: 15px 0;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.card-header {
  color: white;
}

.btn {
  margin-top: 10px;
}
</style>