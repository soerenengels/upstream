<template>
  <details class="block__infokasten" :open="content.opened">
    <summary>
      <span class="h4">{{ headline }}</span>
    </summary>
    <div>
      <k-writer :value="text" />
    </div>
  </details>
</template>

<script>
export default {
  computed: {
    headline() {
      return this.content.headline ? this.content.headline : "Titel eintragen";
    },
    text() {
      return this.content.text ? this.content.text : "Erklärtext eintragen";
    },
    opened() {
      return this.content.opened == true ? "open" : "";
    }
  }
};
</script>

<style>
/** Put your CSS here **/
.block__infokasten {
    background: var(--clr-green-100);
    transition: none;
}
.block__infokasten ::marker {
    color: var(--clr-green-999);
    margin-right: .5em;
}
.block__infokasten summary {
    background: var(--clr-green-500);
    color: var(--clr-green-999);
    padding: .5em;
}    
.block__infokasten > div {
    padding: .25em .5em;
}

</style>
