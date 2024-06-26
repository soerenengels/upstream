<template>
  <p class="format__title">
    {{ title }}
  </p>
</template>

<script>
export default {
  computed: {
    title() {
      if (this.content.upstream_format_select == "Selbst eintragen") {
        return this.content.upstream_format_title
      }
      return this.content.upstream_format_select
    }
  }
};
</script>

<style>
/** Put your CSS here **/
.format__title {
    color: var(--clr-green-999);
    font-weight: bold;
}


</style>
