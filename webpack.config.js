var webpack = require('webpack');
var ngAnnotatePlugin = require('ng-annotate-webpack-plugin');

module.exports = {
    context:__dirname,
    entry :{
        app:'./dashboard/app/index.js'
     
    },
    output:{
        path:__dirname+'/dist',
        filename:'[name].bundle.js'
    },

     plugins: [

        new webpack.ProvidePlugin({
            $ :'jquery',
            jQuery:'jQuery'
        }),
        new ngAnnotatePlugin({
            add: true,
            // other ng-annotate options here 
        })
    ],

    
    module: {
        loaders:[
              {
                test: /\.js$/,     
                exclude: '/node_modules/',
                loader: 'babel-loader',
                query: {
                  presets: ['es2015']
                }
              },
            
                    {
                test: /\.css$/,
                loader: "style-loader!css-loader",
                 exclude: /node_modules/
               
            },
               {
                test: /\.html$/,
                loader: 'raw-loader',
                 exclude: /node_modules/
               
            },
           /* {
              test: /\.(gif|jpg|png|woff[2]*|svg|eot|ttf)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                loader: 'file-loader?name=[name].[ext]',
                 exclude: /node_modules/
               
            }, */
            {
              test: /\.(gif|jpg|png|woff[2]*|svg|eot|ttf)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                loader: 'url-loader?name=[name].[ext]',
                 exclude: /node_modules/
               
            }

        ]
    }


    
};