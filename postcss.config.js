module.exports = {
  plugins: [
        require("postcss-import"),
        require("postcss-preset-env")({
			browsers: [
				"defaults"
			],
            stage: 1,
            features: {
                'logical-properties-and-values': {
					preserve: true
				},
            }

        }),
        require("cssnano")

  ]
};
