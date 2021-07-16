import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import { Table, Button } from 'reactstrap';
import { Link } from 'react-router-dom';
import AppContainer from './AppContainer';
import api from '../api';

const Home = () => {

    const [products, setProducts] = useState(null);
    const fetchProducts = () => {
        api.getAllProducts().then(res => {
            const result = res.data;
            setProducts(result.data)
        });
    }

    useEffect(() => {
        fetchProducts();
    }, []);

    const renderProducts = () => {
        if(!products) {
            return (
                <tr>
                    <td colSpan="4">
                        Loading ...
                    </td>
                </tr>
            );
        }
        if(products.length === 0) {
            return (
                <tr>
                    <td colSpan="4">
                        There is no products yet. Add one.
                    </td>
                </tr>
            );
        }

        return products.map((product) => (
            <tr>
                <td>{product.id}</td>
                <td>{product.name}</td>
                <td>{product.price}</td>
                <td>
                    <Link className="btn btn-warning" to={`/edit/${product.id}`}>
                        Edit
                    </Link>
                    <button 
                    type="button" 
                    className="btn btn-danger"
                    onClick={() => {
                        api.deleteProducts(product.id)
                            .then(fetchProducts)
                            .catch(err => {
                            alert('Failed to delete product with id :' + product.id);
                        });
                    }}
                    >
                        Delete
                    </button>
                </td>
            </tr>
        ))
    }

    return (
        <AppContainer title="Laravel ReactJS - CRUD">
            <Link to="/add" className="btn btn-primary">Add new item</Link>
            <div className="table-responsive">
                <table className="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {renderProducts()}
                    </tbody>
                </table>
            </div>
        </AppContainer>
        // <div className="container body">
        //     <div className="card">
        //         <h5 className="card-header">Laravel ReactJS - CRUD</h5>
        //         <div className="card-body">
        //             <Link to="/add" className="btn btn-primary">Add new item</Link>
        //             <div className="table-responsive">
        //                 <table className="table table-striped mt-4">
        //                     <thead>
        //                         <tr>
        //                             <th>ID</th>
        //                             <th>Name</th>
        //                             <th>Price</th>
        //                             <th>Action</th>
        //                         </tr>
        //                     </thead>
        //                     <tbody>
        //                         <tr>
        //                             <td>x</td>
        //                             <td>xxxx</td>
        //                             <td>xxxx</td>
        //                             <td>
        //                                 <a href="#" className="btn btn-info">Edit</a>
        //                                 <a href="#" className="btn btn-danger">Delete</a>
        //                             </td>
        //                         </tr>
        //                     </tbody>
        //                 </table>
        //             </div>
        //         </div>
        //     </div>
        // </div>
        // <div className=".container">
        //     <Button className="mr-12 btn btn-primary leftbase">Logout</Button>
        //     <Table>
        //         <thead>
        //             <tr>
        //                 <th>#</th>
        //                 <th>Name</th>
        //                 <th>Price</th>
        //                 <th>Action</th>
        //             </tr>
        //         </thead>
        //         <tbody>
        //             <tr>
        //                 <td>x</td>
        //                 <td>xxxx</td>
        //                 <td>xxxx</td>
        //                 <td>
        //                 <Button className="mr-12 btn btn-info">Edit</Button>
        //                 <Button className="mr-12 btn btn-danger">Delete</Button>
        //                 <Button className="mr-12 btn btn-light">I´m Here!</Button>
        //                 </td>
        //             </tr>
        //         </tbody>
        //         <Button>Add Products</Button>
        //     </Table> 
        // {/* <div className="row justify-content-center">
        //     <div className="col-md-8">
        //         <div className="card">
        //             <div className="card-header">Example Component</div>

        //             <div className="card-body">I'm an example component!</div>
        //         </div>
        //     </div>
        // </div> */}
        // </div>
    );
}

export default Home;


