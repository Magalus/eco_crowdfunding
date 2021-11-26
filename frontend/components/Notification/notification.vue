<template>
  <div class="notification alert-danger">
    {{ message }}
  </div>
</template>

<script>
export default {
  name: 'Notification',
  props: ['message']
}
</script>

<style lang="scss" scoped>

.notification {
    margin-top: 20px;
}

</style>