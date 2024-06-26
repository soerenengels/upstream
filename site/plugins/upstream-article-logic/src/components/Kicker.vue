<template>
    <div>
        <k-writer :value="text" class="block__kicker" />
    </div>
</template>

<script>
export default {
  computed: {
    text() {
      return this.content.text ? this.content.text : "Text für Kicker eintragen";
    }
  }
};
</script>

<style>
.block__kicker {
    background: var(--clr-kicker-bg, var(--clr-grey-100));
    color: var(--clr-kicker-text, var(--clr-text));
}
</style>
