        //Button
        var y = document.getElementById('profile-btn');
        var y1 = document.getElementById('manage-trip-btn');
        var y2 = document.getElementById('Book-trip-btn');



        //Hiiden 
        var Z = document.getElementById('Profile');
        var Z1 = document.getElementById('managed-trip');
        var Z2 = document.getElementById('book-trip');

        //Welcome Page
        var a = document.getElementById('welcome');



        function showprofile() {
            if (Z.style.display === 'block') {
                z.classList.remove("d-block");
                Z.classList.add("d-none");
                a.classList.remove("d-none");
                a.classList.add("d-block");

            } else {
                Z.classList.add("d-block");
                a.classList.remove("d-block");
                a.classList.add("d-none");

                //Others 
                Z1.classList.remove("d-block");
                Z1.classList.add("d-none");

                Z2.classList.remove("d-block");
                Z2.classList.add("d-none");
            }
        }

        function showManageTrip() {
            if (Z1.style.display === 'block') {
                Z1.classList.remove("d-block");
                Z1.classList.add("d-none");

                a.classList.remove("d-none");
                a.classList.add("d-block");

            } else {
                Z1.classList.add("d-block");

                a.classList.remove("d-block");
                a.classList.add("d-none");

                //Others 
                Z.classList.remove("d-block");
                Z.classList.add("d-none");

                Z2.classList.remove("d-block");
                Z2.classList.add("d-none");
            }
        }

        function showBookTrip() {
            if (Z2.style.display === 'block') {
                Z2.classList.remove("d-block");
                Z2.classList.add("d-none");

                a.classList.remove("d-none");
                a.classList.add("d-block");

            } else {
                Z2.classList.add("d-block");

                a.classList.remove("d-block");
                a.classList.add("d-none");

                //Others 
                Z.classList.remove("d-block");
                Z.classList.add("d-none");

                Z1.classList.remove("d-block");
                Z1.classList.add("d-none");
            }
        }