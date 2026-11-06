import sys

import grpc
import producto_pb2
import producto_pb2_grpc

# Uso: python client.py [id]   (por defecto id = 1)
producto_id = int(sys.argv[1]) if len(sys.argv) > 1 else 1

with grpc.insecure_channel('127.0.0.1:50051') as canal:
    stub = producto_pb2_grpc.ProductoServiceStub(canal)

    try:
        print(stub.ObtenerProducto(producto_pb2.ProductoRequest(id=producto_id)))
    except grpc.RpcError as error:
        print(error.code(), error.details())
        sys.exit(1)
