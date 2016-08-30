//SELECT e.* FROM `employee` as e left join `employee` as chiefs ON chiefs.id = e.chief_id where chiefs.salary < e.salary 
// SELECT e.* FROM `employee` as e left join `department` as d ON d.id = e.department_id where e.salary = (select max(emp.salary) from employee as emp where e.department_id = emp.department_id)

document.getElementById("field").onclick    =   function(event)
{
        var fieldCoord   =   this.getBoundingClientRect();
        var ball = document.getElementById("ball");

        var field   =   {
            X:   fieldCoord.left + this.clientLeft,
            Y:   fieldCoord.top +  this.clientTop
        };
        
        var ballCoords  =   {
            top: event.clientY - field.Y - (ball.clientHeight/2) + "px",
            left: event.clientX - field.X - (ball.clientWidth/2) +  "px"
        };
        
        ball.style.top = ballCoords.top;
        ball.style.left = ballCoords.left;
};

