<template>
  <div class="vin-decoder">
    <div class="search-box">
      <input v-model="vinQuery" type="text" placeholder="Enter VIN" @keyup.enter="searchVin">
      <button @click="searchVin">Search</button>
    </div>

    <div v-if="vinData && vinData.success" class="vin-details">
      <h2>VIN Details: {{ vinData.vin }}</h2>
      <table class="table-auto w-full">
        <tr v-for="(value, key) in vinData.specification" :key="key">
          <td class="capitalize font-bold">{{ formattedKey(key) }}</td>
          <td>{{ value || 'N/A' }}</td>
        </tr>
      </table>
    </div>

    <div v-if="vinData && !vinData.success" class="error">
      Failed to decode VIN. Please try again.
    </div>
  </div>
</template>

<script>
export default {
  name: 'VinDecoder',
  data() {
    return {
      vinQuery: '',
      vinData: null, // Placeholder for VIN data from backend
    };
  },
  methods: {
    async searchVin() {
      // Check if vinQuery is not empty
      if (!this.vinQuery) {
        alert('Please enter a VIN to decode.');
        return;
      }

      try {
        const response = await axios.get(`/decode-vin?vin=${this.vinQuery}`);
        this.vinData = response.data;
      } catch (error) {
        console.error('Error fetching VIN data:', error);
        this.vinData = { success: false };
      }
    },
    formattedKey(key) {
      // Replace underscores with spaces and capitalize the first letter
      return key.replace(/_/g, ' ').replace(/\b\w/g, char => char.toUpperCase());
    }
  }
};
</script>

<style scoped>
.vin-decoder {
  max-width: 600px;
  margin: auto;
}

.search-box {
  display: flex;
  gap: 10px;
  margin-bottom: 20px;
}

input[type="text"] {
  width: 100%;
  padding: 8px;
}

button {
  padding: 8px 16px;
}

.vin-details, .error {
  margin-top: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

td {
  padding: 8px;
  border: 1px solid #ddd;
}

.capitalize {
  text-transform: capitalize;
}
</style>
