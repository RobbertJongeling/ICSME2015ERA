> data <- read.csv("exampleinput.csv")
> require(nparcomp)
> c <- nparcomp(data$diffSeconds ~data$typetitle, data=data, asy.method = "probit", type ="Tukey", plot.simci=TRUE) 
> c$Analysis
> d <- nparcomp(data$diffSeconds ~data$typedesc, data=data, asy.method = "probit", type ="Tukey", plot.simci=TRUE)
> d$Analysis
                Comparison Estimator Lower Upper Statistic   p.Value
1  p( negative , neutral )     0.509 0.448 0.570 0.3417753 0.9365075
2 p( negative , positive )     0.518 0.477 0.559 1.0065592 0.5650473
3  p( neutral , positive )     0.508 0.444 0.572 0.3070635 0.9487506