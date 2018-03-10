module.exports = {
    devtool: "source-map",

    entry: {
        menu: ["babel-polyfill", "./src/menu.js"],
        content: ["babel-polyfill", "./src/content.js"]
    },

    output: {
        filename: "dist/[name].js"
    },

    // From babeljs.io/docs/setup
    // and getbootstrap.com/docs/4.0/getting-started/webpack/
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules|pdfjs/,
                loader: "babel-loader"
            },
            {
                test: /\.css$/,
                use: ["style-loader", "css-loader"]
            }
        ]
    }
};
