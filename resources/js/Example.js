import React from 'react';
import ReactDOM from 'react-dom';
import { Table, Button } from 'reactstrap';

function Example() {
    return (
        <div className=".container">
            <Button className="mr-12 btn btn-primary">Logout</Button>
            <Table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>x</td>
                        <td>xxxx</td>
                        <td>xxxx</td>
                        <td>
                        <Button className="mr-12 btn btn-info">Edit</Button>
                        <Button className="mr-12 btn btn-danger">Delete</Button>
                        </td>
                    </tr>
                </tbody>
                <Button>Add Products</Button>
            </Table> 
            {/* <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>

                        <div className="card-body">I'm an example component!</div>
                    </div>
                </div>
            </div> */}
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
