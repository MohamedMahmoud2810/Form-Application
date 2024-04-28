<template>
  <div>
    <h1>Subscribers List</h1>
    <div class="table-responsive"> <table class="table table-striped table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>Arabic Name</th>
            <th>English Name</th>
            <th>Reference</th>
            <th>Type</th>
            <th>Identity Type</th>
            <th>Identity Number</th>
            <th>Arabic Address</th>
            <th>English Address</th>
            <th>About (Arabic)</th>
            <th>About (English)</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="subscriber in subscribers" :key="subscriber.id">
            <td>{{ subscriber.id }}</td>
            <td>{{ subscriber.subscriber_arabic_name }}</td>
            <td>{{ subscriber.subscriber_english_name }}</td>
            <td>{{ subscriber.subscriber_reference }}</td>
            <td>{{ subscriber.subscriber_type }}</td>
            <td>{{ subscriber.identity_type }}</td>
            <td>{{ subscriber.identity_number }}</td>
            <td>{{ subscriber.arabic_address }}</td>
            <td>{{ subscriber.english_address }}</td>
            <td>{{ subscriber.about_subscriber_arabic }}</td>
            <td>{{ subscriber.about_subscriber_english }}</td>
            <td>
              <button @click="handleDelete(subscriber.id)" class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-if="error">{{ error }}</div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      subscribers: [],
      error: null,
    };
  },
  mounted() {
    this.fetchSubscribers();
  },
  methods: {
    fetchSubscribers() {
      axios.get('http://localhost:8000/api/subscribers')
        .then(response => {
          this.subscribers = response.data.subscribers;
        })
        .catch(error => {
          this.error = error.response.data.error || 'An error occurred.';
        });
    },
    handleDelete(subscriberId) {
      if (confirm('Are you sure you want to delete this subscriber?')) {
        axios.delete(`http://localhost:8000/api/subscribers/${subscriberId}`)
          .then(() => {
            this.subscribers = this.subscribers.filter(subscriber => subscriber.id !== subscriberId);
          })
          .catch(error => {
            this.error = error.response.data.error || 'An error occurred while deleting.';
          });
      }
    },
  },
};
</script>
