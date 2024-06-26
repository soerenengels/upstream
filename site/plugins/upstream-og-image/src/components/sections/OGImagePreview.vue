<template>
	<section class="k-og-preview k-fields-section">
		<k-field 
            :label="label" 
            class="k-field-header">
        </k-field>
        <k-image :src="url" back="white" cover="true" ratio="2/1" />
        <k-text theme="help">
            {{ help }}
        </k-text>
    </section>
</template>

<script>
export default {
	data() {
		return {
			label: null,
			url: null,
            help: null
		};
	},
    created() {
        this.load().then(response => {
            this.label = response.label;
            this.url = response.url;
            this.help = response.help;
        });
    }
};
</script>

<style>
.k-og-preview img {
    display: block;
    max-width: 100%;
    height: auto;
}

</style>
