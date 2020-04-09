<template>
    <div>
<h1 class="text-center">Create Product</h1>
<div>
    
  <b-card bg-variant="light">
    <!-- <b-form-group
      label-cols-lg="3"
      label="Shipping Address"
      label-size="lg"
      label-class="font-weight-bold pt-0"
      class="mb-0"
    > -->
    <b-row>
    <b-col>
      <b-form-group
        label-cols-sm="3"
        label="Street:"
        label-align-sm="right"
        label-for="nested-street"
      >
        <b-form-input id="nested-street"></b-form-input>
      </b-form-group>

      <b-form-group
        label-cols-sm="3"
        label="City:"
        label-align-sm="right"
        label-for="nested-city"
      >
        <b-form-input id="nested-city"></b-form-input>
      </b-form-group>

      <b-form-group
        label-cols-sm="3"
        label="State:"
        label-align-sm="right"
        label-for="nested-state"
      >
        <b-form-input id="nested-state"></b-form-input>
      </b-form-group>

      <b-form-group
        label-cols-sm="3"
        label="Country:"
        label-align-sm="right"
        label-for="nested-country"
      >
        <b-form-input id="nested-country"></b-form-input>
      </b-form-group>

      <b-form-group
        label-cols-sm="3"
        label="Ship via:"
        label-align-sm="right" class="mb-0"
      >
        <b-form-radio-group
          class="pt-2"
          :options="['Air', 'Courier', 'Mail']"
        ></b-form-radio-group>
      </b-form-group>
    <!-- </b-form-group> -->
 </b-col>
    <b-col>2 of 3</b-col>
  </b-row>

  </b-card>
</div>

    </div>
</template>

<script>
    export default {
        layout: 'adminLte',
        
    }
</script>

<style lang="css" scoped>
.form-group {
    margin-bottom: 0.2rem;
}
</style>