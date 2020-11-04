<template>
<div class="col-md-4">
  <div class="card">
    <div class="card-header">Remainder</div>
    <div class="card-body">
      <ul class="list-group list-group-flush">
        <li class="list-group-item list-group-item-action" v-for="remainder in remainders" :key="remainder.id">
          <strong>{{ remainder.lead.name }}</strong><br>
          <inertia-link class="capitalize"
            :href="$route('remainder.edit', {lead: remainder.lead, remainder: remainder})">
            {{ remainder.remainder }}
          </inertia-link>
        </li>
      </ul>
    </div>
  </div>
</div>
</template>

<script>
export default {
  props: {
    remainders: Array
  }
}
</script>