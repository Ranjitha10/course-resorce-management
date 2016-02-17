#include<stdio.h>
#include<string.h>
#include<math.h>
int a[10],b[10],d[1000],g=0,g1=0,g2=0,enc[1000],decr[1000],m[5],c[5],key[10],c1[5],m1[5];
int k=0;
char text[100];
/* Function to convert decimal to binary.*/
void bin( int f)
{
	int i=0,r=0,j=0;
	int e[20];
	while(f>0)
	{
		r=0;
		r= f%2;
		e[i++]= r;
		f = f/2;
	}
	for(i=i-1;i>=0;i--)
	{
		d[g] = e[i];
		g++;
	}
		
}
int pow1(int base,int power)
{
    int i;
    int prod=1;
    for(i=0;i<power;i++)
        prod*=base;
    return prod;
}
// Function to convert binary to decimal.
int binary_decimal(int n[7])  
 
{
    int i=0, rem ,decimal=0;
        int j=6;
    
    i=0; 
     
        while (j>=0) 
        { 
        decimal += n[j]*pow1(2,i);
        --j; 
        ++i; 
        }
        return decimal; 
}


/* function for encryption*/
void encrp()
{
	int t=0,j,i;
	//crossover
	for(j=c[0];j<=c[1];j++){
		t=0; 
		t=a[j];
		a[j]=b[j];
		b[j]=t;
	}
	//mutation
	for(i=0;i<8;i++){
		if(i==m[0]){
			if(a[i]==0)
				a[i]=1;
			else if(a[i]==1)
				a[i]=0;	
			if(b[i]==0)
				b[i]=1;
			else if(b[i]==1)
				b[i]=0;		
	
		}
		if(i==m[1]){
			if(a[i]==0)
				a[i]=1;
			else if(a[i]==1)
				a[i]=0;	
			if(b[i]==0)
				b[i]=1;
			else if(b[i]==1)
				b[i]=0;
		}
	}
	for(i=0;i<8;i++)
		enc[g1++]=a[i];
	for(i=0;i<8;i++)
		enc[g1++]=b[i];
}

/* function for decryption*/
void decry()
{
	int t=0,j,i;
	//crossover
	for(j=c1[0];j<=c1[1];j++){
		t=0; 
		t=a[j];
		a[j]=b[j];
		b[j]=t;
	}
	//mutation
	for(i=0;i<8;i++){
		if(i==m1[0]){
			if(a[i]==0)
				a[i]=1;
			else if(a[i]==1)
				a[i]=0;	
			if(b[i]==0)
				b[i]=1;
			else if(b[i]==1)
				b[i]=0;		
	
		}
		if(i==m1[1]){
			if(a[i]==0)
				a[i]=1;
			else if(a[i]==1)
				a[i]=0;	
			if(b[i]==0)
				b[i]=1;
			else if(b[i]==1)
				b[i]=0;
		}
	}
	for(i=0;i<8;i++)
		decr[g2++]=a[i];
	for(i=0;i<8;i++)
		decr[g2++]=b[i];
}

int main()
{
	int i,p,t=0;
	printf("Enter the text\n");
	//for(i=0;i<16;i++)
	scanf("%s",text);
	char str[100];
	int str1[100];
	for(i=0;i<strlen(text);i++)
		str1[i]=(int)(text[i]);
	
	printf("Enter the crossover key\n");
	for(i=0;i<2;i++){
		scanf("%d",&c[i]);
	}
	printf("Enter the mutation key\n");
	for(i=0;i<2;i++){
		scanf("%d",&m[i]);
	}	
	key[0]=c[0];  
	key[1]=c[1];
	key[2]=m[0];
	key[3]=m[1];	
	c1[0]=key[0];
	c1[1]=key[1];
	m1[0]=key[2];
	m1[1]=key[3];	
	for(i=0;i<strlen(text);i++)
		bin(str1[i]);
	k=0;	
	int j;
	while(k<g)
	{
		for(i=0;i<8;i++)
			a[i]=d[k++];
		j=0;
		for(i=8;i<16;i++)
		{
			b[j]=d[k++];
			j++;	
		}
		encrp();
			//k=k+16;
	}
	int l=0,v=0,dec[10],dec1[10],w[100],w1[100],o=0,o1=0;
	char st[100];
	printf("Text:");
	for(i=0;i<g;i++)
		printf("%d",d[i]);
	printf("\nEncrypted text:");
	for(i=0;i<g;i++)
		printf("%d",enc[i]);
	
	while(v<g1)
	{
		for(i=0;i<7;i++)
		{
			dec1[i]=enc[v++];
		}
		w1[o1++]=binary_decimal(dec1);
		
	}
	for(i=0;i<o1;i++)
	{
		st[i]=(char)(w1[i]);
	}
	st[i+1]='\0';
	printf("\n%s\n",st);
	k=0;
	while(k<g1)
	{
		for(i=0;i<8;i++)
			a[i]=enc[k++];
		j=0;
		for(i=8;i<16;i++)
		{
			b[j]=enc[k++];
			j++;	
		}
		decry();
		//k=k+16;
	}
	printf("\nDecrypted text:");
	for(i=0;i<g;i++)
		printf("%d",decr[i]);
	//printf("\n%d\t%d\t%d\n",g,g1,g2);
	
	while(l<g2)
	{
		for(i=0;i<7;i++)
		{
			dec[i]=decr[l++];
		}
		w[o++]=binary_decimal(dec);
		
	}
	for(i=0;i<o;i++)
	{
		str[i]=(char)(w[i]);
	}
	str[i+1]='\0';
	printf("\nDecrypted text=%s\n",str);
				
	return 0;
}
