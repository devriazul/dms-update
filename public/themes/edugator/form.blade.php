@extends('layouts.theme')

@section('content')


    <div class="blog-post-page-header bg-dark-blue text-white text-center py-5">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h1 class="mb-3">{{$title}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-md-5 border rounded box-shadow p-md-5 p-3" style="background-image: url('https://textures.world/wp-content/uploads/2018/10/14-White-Paper-Different-Texture-Types-A4-Linen-1-600x849.jpg')">
        <div class="text-center">
            <img src="https://londondms.com/uploads/images/website-dms-logo.png" alt="">
            <h5 class="pt-2">''Education is the key to Success"</h5>
            <h5>New Student <br> Admission Application Form <br>
            <small>(all information will be treated confidentially)</small></h5>
        </div>
        <form class="px-md-5 mx-md-5">
          <div class="row justify-content-between">
            <div class="form-group col-12 col-md-6 d-flex align-items-center row">
                <label class="col-4" for="name">Student's Full Name:</label>
                <input
                  type="text"
                  class="form-control col-8"
                  id="name"
                  placeholder="Enter your name"
                />
              </div>
              <div class="form-group col-12 col-md-6 d-flex align-items-center row">
                <label class="col-4" for="dob">Date of Birth:</label>
                <input type="date" class="form-control col-8" id="dob" />
              </div>
          </div>
          <div class="row justify-content-between">
            <div class="form-group col-12 col-md-6 d-flex align-items-center row">
                <label class="col-4" for="gender">Gender</label>
                <select class="form-control col-8" id="gender">
                  <option>Male</option>
                  <option>Female</option>
                  <option>Other</option>
                </select>
              </div>
              <div class="form-group col-12 col-md-6 d-flex align-items-center row">
                <label class="col-4" for="email">Contact E-mail:</label>
                <input
                  type="email"
                  class="form-control col-8"
                  id="email"
                  placeholder="Enter email"
                />
              </div>
          </div>
          <div class="row justify-content-between">
            <div class="form-group col-12 col-md-6 d-flex align-items-center row">
                <label class="col-4" for="email">Contact Number:</label>
                <input
                  type="text"
                  class="form-control col-8"
                  id="number"
                  placeholder="Enter number"
                />
              </div>
              <div class="form-group col-12 col-md-6 d-flex align-items-center row">
                <label class="col-4" for="address">Home Address:</label>
                <textarea class="form-control col-8" id="address" rows="2"></textarea>
              </div>
          </div>
          <div class="row justify-content-between">
            <div class="form-group col-12 col-md-6 d-flex align-items-center row">
                <label class="col-4" for="email">Last Educational Institution Attended:</label>
                <input
                  type="text"
                  class="form-control col-8"
                  id="education"
                  placeholder="Enter last educational institution attended"
                />
              </div>
              <div class="form-group col-12 col-md-6 d-flex align-items-center row">
                <label class="col-4" for="course">Course applied for:</label>
                <input
                  type="text"
                  class="form-control col-8"
                  id="course"
                  placeholder="Enter course name"
                />
              </div>
          </div>
          <h4 >
            <u>Emergency Contact:</u> 
          </h4>
          
          <div class="row justify-content-between">
            <div class="form-group col-12 col-md-6 d-flex align-items-center row">
                <label class="col-4" for="name">Name:</label>
                <input
                  type="text"
                  class="form-control col-8"
                  id="name"
                  placeholder="Enter name"
                />
              </div>
              <div class="form-group col-12 col-md-6 d-flex align-items-center row">
                <label class="col-4" for="name">Contact Number:</label>
                <input
                  type="text"
                  class="form-control col-8"
                  id="number"
                  placeholder="Enter contact number"
                />
              </div>
          </div>
          <div class="row justify-content-between">
                <div class="form-group col-12 col-md-6 d-flex align-items-center row">
                    <label class="col-4" for="name">Relationship to student:</label>
                    <input type="text" class="form-control col-8" id="relationship" placeholder="Enter relationship"/>
              </div>
              <div class="form-group col-12 col-md-6 d-flex align-items-center row">
                <label class="col-4" for="name">Address:</label>
                <textarea class="form-control col-8" id="address" rows="2"></textarea>
              </div>
          </div>
          <div class="text-center">
            <h5>Terms and Conditions</h5>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
              <a href="" data-toggle="collapse" data-target="#terms">Accept all terms and conditions.</a>
            </label>
          </div>
          <div class="collapse" id="terms">
            <p><small class="text-left">In consideration of accepting my place at the above mentioned course offered by the Digital Marketing School LTD, I hereby declare that all 
              the information provided on this form is true and accurate to the best of my knowledge. </p><p>
              I understand that the Certificate and Transcript will be sent to me digitally once the course will finish if I passed all the assignments and that 
              there is a fee to receive the Certificate and Transcript in physical form. </p><p>
              The non-refundable OTHM registration fee of £150 must be paid before the start of the academic term. The registration fee is a one-time fee 
              that covers the cost of processing and administration. The registration fee is non-refundable and non-transferable, regardless of the 
              circumstances. In case of cancellation of admission or withdrawal from the program, the registration fee will not be refunded. Failure to pay 
              the registration fee by the due date may result in the student being unable to enroll in the program. The registration fee must be paid in full 
              and is not eligible for installment payments </p><p>
              The institution reserves the right to make changes to the registration fee policy without prior notice.</p><p>
              By paying the non-refundable OTHM registration fee, the student agrees to these terms and conditions. The institution reserves the right to 
              take legal action against students who fail to pay the non-refundable OTHM registration fee.</p><p>Tuition fees are refundable prior to the enrollment date. To be eligible for a refund, the student must notify the institution in writing of their intention to withdraw from the program. Refunds will be processed within 30 days of receipt of the written notice. The amount of the refund will be based on the date the written notice was received, as follows:
                  <ul>
                      <li>If the written notice is received more than 30 days prior to the enrollment date, a full refund of the tuition fees will be issued.</li>
                      <li>If the written notice is received less than 30 days but more than 14 days prior to the enrollment date, a 50% refund of the tuition fees will be issued.</li>  
                      <li>If the written notice is received less than 14 days prior to the enrollment date, no refund of the tuition fees will be issued.</li>
                  </ul>
                  The institution reserves the right to make changes to the refund policy without prior notice. The refund policy applies only to tuition fees and 
                  does not include any additional fees, such as textbooks, materials, or other costs associated with the program. The institution is not 
                  responsible for any bank fees or other charges incurred as a result of the refund. The institution reserves the right to refuse a refund in cases 
                  of academic misconduct or violations of the institution's policies and procedures. </p><p>These terms and conditions are governed by the laws of England and Wales. Any disputes arising from these terms and conditions will be 
                  resolved in the courts of England and Wales.            
              </small>
            </p>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
            <label class="form-check-label" for="defaultCheck2">
              <a data-toggle="collapse" data-target="#policy" href="">Accept all privacy & policy.</a>
            </label>
          </div>
          <div class="collapse" id="policy">
            <small>
              We will use your data only to provide you with the services you request and for no other purpose. This data may include, but is not limited to, improving our services, providing customer support, and communicating with you about our services. <br><br>

              We will not share your data with third parties except as required by law or to provide you with the services you request. Suppose we are required to share your data with a third party. In that case, we will only do so with your prior consent. We will take the necessary action to ensure that the third party protects the security and confidentiality of your data.<br><br>

              We will retain your data for as long as necessary to provide you with the services you request and to comply with legal and regulatory requirements.

              "I Agree" or using the Data Store, you agree to these terms and conditions and give your informed consent for the collection, storage, use, and sharing of your data as described above.<br><br>

              Your data will be stored in secure servers located within the European Union. Appropriate security measures will protect them. We will take reasonable steps to ensure your data's security and prevent unauthorized access to it.

              Electronic Certificate Availability: Students may download an electronic copy of their certificate from the DMS portal or the awarding body portal free of charge.<br><br>

              Request for Paper Certificate: If a student requests a paper copy of their certificate, they will be required to pay a fee of £50 to cover the cost of printing and postal services.

              Payment Terms: Payment for paper certificates must be made in full before the certificate is mailed out. Acceptable forms of payment include credit/debit cards and PayPal.<br><br>

              Shipping: Paper certificates will be shipped via a tracked postal service, and the student will be provided with a tracking number. The shipping address provided by the student must be correct and complete. We are not accountable for lost or delayed certificates due to incorrect shipping information.

              Delivery Time: Delivery times may vary based on the shipping location, but we will make every effort to get the certificate to the student as soon as possible.<br><br>

              Refunds: Refunds for paper certificates will only be given if the certificate is not delivered or delivered damaged. In such cases, the student must provide proof of non-delivery or damage.

              Changes to Terms: We withhold the right to modify these terms and conditions at any moment. If we make changes, we will notify students of the changes.
            </small>
          </div>
          <div class="row justify-content-between pt-3">
              <div class="form-group col-12 col-md-6 d-flex align-items-center row">
                  <label class="col-4" for="date">Dated:</label>
                  <input type="date" class="form-control col-8" id="date" />
              </div>
              <div class="form-group col-12 col-md-6 d-flex align-items-center row">
                  <label class="col-4" for="sign">Signature:</label>
                  <input type="text" class="form-control col-8" id="sign" />
              </div>
          </div>
          {{-- <div class="d-flex justify-content-between row pt-3">
              <div class="form-group d-flex align-items-center col-12 col-md-6 pr-md-5">
                  <label class="pr-2" for="date">Dated:</label>
                  <input type="date" class="form-control" id="date" />
              </div>
              <div class="form-group d-flex align-items-center col-12 col-md-6 pl-md-5">
                  <label class="pr-2" for="sign">Signature:</label>
                  <input type="text" class="form-control" id="sign" />
              </div>
          </div> --}}
          <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
      </div>
    
@endsection
