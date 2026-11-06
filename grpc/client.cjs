const grpc = require('@grpc/grpc-js');
const loader = require('@grpc/proto-loader');
const path = require('path');

// Uso: node grpc/client.cjs [id]   (por defecto id = 1)
const id = Number.parseInt(process.argv[2] ?? '1', 10);

const def = loader.loadSync(path.join(__dirname, 'producto.proto'));
const api = grpc.loadPackageDefinition(def).inventario;

const client = new api.ProductoService('127.0.0.1:50051', grpc.credentials.createInsecure());

client.ObtenerProducto({ id }, (err, producto) => {
    if (err) {
        console.error(`Error gRPC (${grpc.status[err.code]}): ${err.details}`);
        process.exitCode = 1;
    } else {
        console.log(producto);
    }

    client.close();
});
