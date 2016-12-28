<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>Hi <?=$this->input->post('title')." ".$this->input->post('firstName')?>,<br>
            This is to notify you that your details on our server was modified moments ago. 
            Find below your new details and kindly crosscheck to ensure there are no errors.
            However, do not hesitate to contact us if you did not authorise the modifications. Thanks.
        </p>
        <table style="text-align: left">
            <tbody>
                <tr>
                    <th>Title:</th>
                    <td></td>
                    <td><?=$this->input->post('title') ? $this->input->post('title') : "---"?></td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td></td>
                    <td>
                        <?=$this->input->post('firstName')." ".$this->input->post('lastName')." ".$this->input->post('otherName')?>
                    </td>
                </tr>
                <tr>
                     <th>Phone Number(s):</th>
                     <td></td>
                    <td>
                        <?=$this->input->post('mobile1') . ($this->input->post('mobile2') ? ", ".$this->input->post('mobile2') : "")?>
                    </td>
                </tr>
                <tr>
                    <th>Membership ID:</th>
                    <td></td>
                    <td><?=$this->input->post('membershipId')?></td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td></td>
                    <td><?=$this->input->post('gender')?></td>
                </tr>
                <tr>
                    <th>Street:</th>
                    <td></td>
                    <td><?=$this->input->post('address')?></td>
                </tr>
                <tr>
                    <th>City:</th>
                    <td></td>
                    <td><?=$this->input->post('city')?></td>
                </tr>
                <tr>
                    <th>State:</th>
                    <td></td>
                    <td><?=$this->input->post('state')?></td>
                </tr>
                <tr>
                    <th>Country:</th>
                    <td></td>
                    <td><?=$this->input->post('country')?></td>
                </tr>
            </tbody>
        </table>
        <p><small>The Manager, <br>Ibadan Golf Club</small></p>
    </body>
</html>
