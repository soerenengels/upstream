<template>
    <ul class="article__engage">

    </ul>
</template>

<style scoped>
.article__engage {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(min(15rem, 100%), 1fr));
  gap: .5em;
  margin-inline: 0;
  aspect-ratio: 32 / 9;
  background: url('../assets/engagement-section.png');
  background-size: contain;
  background-repeat: no-repeat;
  filter: blur(.2em);
}
</style>
